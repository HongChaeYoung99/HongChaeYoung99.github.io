<html>
<h1>새로 배운 내용</h1>
<p>오라클과 자바 연동하는 방법을 배웠다. 오라클과 JDK를 설치한 후에 jar파일을 인텔리J라이브러리에 넣는다.<br><br>
연결하는 자바 코드:<br>
Connection conn = null;<br>
		String driver = "oracle.jdbc.driver.OracleDriver";<br>
		String url = "jdbc:oracle:thin:@localhost:1521:xe";<br>
		String user = "system";<br>
		String password = "system"; <br>
		try {<br>
			Class.forName(driver);	<br>		
			conn = DriverManager.getConnection(url, user, password);<br>
			System.out.println("connection completed");<br>
			conn.close();<br>
			System.out.println(conn.isClosed()?"connection closed":"closing connection");<br>
		} catch (ClassNotFoundException | SQLException e) {<br>
			System.out.println("connection failed");<br>
			e.printStackTrace();<br>
		} 
</p>
<h1>문제가 발생하거나 고민한 내용 + 해결 과정</h1>
<p>
데이터베이스에 연결할때 listener refused the connection with the following error ora-12505오류가 계속 생겼었다.
데이터베이스 포트번호가 1521이 아니라 1522라는걸 모르고 있어서 계속 오류가 생긴 것이였다. 왜 연결이 안되는지 고민하다가 지웠다가 다시
깔았는데 그때 포트번호를 확인해서 해결했다. </p>
<p>인텔리J에 JDBC를 테스트하려는데 IntelliJ Idea JDBC Class Not Found Exception 에러를 겪었다. Project Structure에서 problems를 이용해서 해결했다.
</p>
<h1>참고할 만한 내용</h1>

<a href = "https://www.youtube.com/watch?v=Wac34_YG42I">IntelliJ Idea JDBC Class Not Found Exception 해결 방법</a><br>
<a href = "https://pjh3749.tistory.com/171">IntelliJ에서 JDBC 테스트하기</a><br>
<a href = "https://whitepaek.tistory.com/18">[IntelliJ] JDBC 연동, Java MySQL 연결</a>

<h1>회고(+,-,!)</h1>
<h3>+</h3>
<p>
자바를 통해 데이터베이스프로그래밍을 하려다가 포기했었는데 이번에 배울 수 있게 되어서 좋다.
</p>
<h3>-</h3>
<p>
프로그램을 설치할 때 시간이 너무 오래걸렸다. 자바기초를 이번 학기에 듣고 있어서 잘따라갈 수 있을 지 조금 걱정된다.
</p>
<h3>!</h3>
<p>
자바로 오라클을 접속 할때 try - catch문을 사용한다는 것을 알았다.
</p>
</html>
