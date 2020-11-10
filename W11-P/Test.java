package db;

import java.sql.*;

public class Test {
    private static String className = "oracle.jdbc.driver.OracleDriver";
    private static String url = "jdbc:oracle:thin:@localhost:1522:xe";
    private static String user = "hr";
    private static String password = "1234";

    public static Connection getConnection() {
        Connection conn = null;

        try {
            Class.forName(className);
            conn = DriverManager.getConnection(url, user, password);
            System.out.println("connection success");
        } catch (ClassNotFoundException | SQLException e) {
            System.out.println("connection fail");
            e.printStackTrace();
        }

        return conn;
    }
    public void closeAll(Connection conn, PreparedStatement pstm, ResultSet rs) {
        try {
            if (rs != null) rs.close();
            if (pstm != null) pstm.close();
            if (conn != null) conn.close();
            System.out.println("connection closed");
        } catch (SQLException sqle) {
            System.out.println("error");
            sqle.printStackTrace();
        }
    }

    private void select() {
        Connection conn = null;
        PreparedStatement pstm = null;
        ResultSet rs = null;
        String sql = "select * from ( select * from countries order by country_id desc ) where rownum = 1";
        try {
            conn = getConnection();
            pstm = conn.prepareStatement(sql);
            rs = pstm.executeQuery(sql);
            int count = 0;
            while(rs.next()) {
                System.out.print("\ncounrty_id: " + rs.getString("country_id"));
                System.out.print("\tcounrty_name: " + rs.getString("country_name"));
                System.out.println("\tregion_id: " + rs.getString("region_id"));
                count = count + 1;
            }
            System.out.println(count + " row selected\n");
        } catch (SQLException e) {
            e.printStackTrace();
        } finally {
            this.closeAll(conn, pstm, rs);
        }
    }
    private void update() {
        Connection conn = null;
        PreparedStatement pstm = null;
        String sql = "update countries set country_name = 'Zim2' where country_id = 'ZW'";
        try {
            conn = getConnection();
            pstm = conn.prepareStatement(sql);
            int count = pstm.executeUpdate(sql);
            System.out.println(count + " row updated");
        } catch (SQLException e) {
            e.printStackTrace();
        } finally {
            this.closeAll(conn, pstm, null);
        }
    }
    private void insert() {
        Connection conn = null;
        PreparedStatement pstm = null;
        String sql = "insert into countries values ('ZZ', 'Pall',4)";

        try {
            conn = getConnection();
            pstm = conn.prepareStatement(sql);
            int count = pstm.executeUpdate(sql);
            System.out.println(count + " row inserted");
        } catch (SQLException e) {
            e.printStackTrace();
        } finally {
            this.closeAll(conn, pstm, null);
        }
    }

    private void delete() {
        Connection conn = null;
        PreparedStatement pstm = null;
        String sql = "delete from countries where country_id = 'ZZ'";
        try {
            conn = getConnection();
            pstm = conn.prepareStatement(sql);
            int count = pstm.executeUpdate(sql);
            System.out.println(count + " row deleted");
        } catch (SQLException e) {
            e.printStackTrace();
        } finally {
            this.closeAll(conn, pstm, null);
        }
    }

    public static void main(String[] args) {
        Test so = new Test();
        so.select();
        so.insert();
        so.select();
        so.delete();
        so.select();
        so.update();
        so.select();
    }
}
