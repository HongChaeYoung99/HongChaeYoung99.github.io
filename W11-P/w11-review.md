<html>
<h1>새로 배운 내용</h1>
<p>
정보 조회, 수정, 추가, 삭제 <br>
조회 <br>
String sql = "select e.first_name, e.last_name, d.department_name from employees e, departments d where e.department_id = d.department_id order by d.department_name ASC";<br>
Statement stmt = conn.createStatement();<br>
			ResultSet rs = stmt.executeQuery(sql);<br>
			System.out.println("FIRST_NAME \t LAST_NAME \t DEPARTMENT_NAME");<br>
			while(rs.next()) {<br>
				System.out.print(rs.getString(1));<br>
				System.out.print("\t\t" + rs.getString(2));<br>
				System.out.println("\t\t" + rs.getString(3));<br>
			}<br>
  수정 <br>
  String sql = "update employees set salary = 10000 where employee_id = 206";<br>
  System.out.println(count + " row updated");<br>
  삽입 <br>
  String sql = "insert into employees values (207, 'minjun', 'do', 'minjun.do', '123.456.789', TO_DATE(SYSDATE, 'dd-MM-yyyy'), 'AC_ACCOUNT', 10000, NULL, NULL, NULL)";		<br>
  int count = pstm.executeUpdate(sql);<br>
  삭제 <br>
  String sql = "delete from employees where employee_id = 207";		<br>
  int count = pstm.executeUpdate(sql);<br>


  
</p>


<p>리팩토링

  private static String className = "oracle.jdbc.driver.OracleDriver";<br>
	private static String url = "jdbc:oracle:thin:@localhost:1521:xe";<br>
	private static String user = "hr";<br>
	private static String password = "1234";<br>
	
	public static Connection getConn() {
		Connection conn = null;
		
		try {
			Class.forName(className);<br>
			conn = DriverManager.getConnection(url, user, password);
			System.out.println("connection success");
		} catch (ClassNotFoundException | SQLException e) {
			System.out.println("connection fail");
			e.printStackTrace();
		}
		
		return conn;
	} public void closeAll(Connection conn, PreparedStatement pstm, ResultSet rs) {
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
</p>
<h1>문제가 발생하거나 고민한 내용 + 해결 과정 </h1>
<p>실행이 되다가 자꾸 업데이트문에서 멈춘 상태로 실행이 되지않았다. 이유를 모르겠어서 노트북을 껐다 켰더니 실행이 됐다. 노트북 문제 였던 것 같다.</p>
<h1>참고할 만한 내용</h1>
<p><a href = "https://allg.tistory.com/23">[JDBC] Update 문 실행</a></p>
<h1>회고(+,-,!)</h1>
<p>
+: 화요일 안에 과제도 강의도 다 들었다.<br>
-: UPDATE문에서 실행이 되지 않은 이유를 찾지못했다.<br>
!: PreparedStatement를 이용하면 보안을 강화시킬 수 있다.</p>
<h1>동작영상</h1>
<a href = "https://youtu.be/DawBA4MKXQM">동작영상</a>

</html>
