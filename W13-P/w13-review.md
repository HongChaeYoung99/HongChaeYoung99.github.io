<html>

<h1>새로 배운 내용</h1>
<p>아파치 톰캣 서버와 JSP, 이클립스를 사용해서 데이터베이스프로그래밍을 하는 방법</p>
<p>JSP, Java Server Page
HTML 내부에 java 코드를 입력하여, 웹 서버에서 동적으로 웹 브라우저를 관리하는 언어

JSP 구동 원리
JSP를 실행하면, JSP 에서 생성된 서블릿이 실행됨
1) 클라이언트가 jsp 실행을 요청하면, 서블릿 컨테이너는 jsp 파일에 대응하는 자바 서블릿을 찾아서 실행한다.
2) 대응하는 서블릿이 없거나, jsp 파일이 변경되었으면, jsp 엔진을 통해 서블릿 자바 소스를 생성한다.
3) 자바 컴파일러가 서블릿 자바 소스를 클래스 파일로 컴파일 한다. (jsp 파일이 변경될때마다 반복)
4) jsp 로 부터 생성된 서블릿은 서블릿 구동 방식에 의해 service() 메소드가 호출되고, 서블릿이 생성한 html 화면을 웹 브라우저로 보낸다. 
</p>
<h1>문제가 발생하거나 고민한 내용 + 해결 과정</h1>
<p>계속 500에러가 발생했다. 내부 서버에서 오류가 생겼다. 
나와 똑같은 에러가 뜨는 학생이 Q&A에 글을 올려서 봤더니 다시 삭제했다가 깔았더니 됐다는 댓글이 있어서 이클립스를 삭제했다가 다시 깔아서 해결했다.
지금도 왜 오류가 떴는지는 모르겠다. </p>
<h1>참고할 만한 내용</h1>
https://jamesdreaming.tistory.com/165<br>
https://ooz.co.kr/398<br>
<h1>회고(+,-,!)</h1>
<p>
+: 결국 실습을 끝까지 성공했다.<br>
-: 이클립스를 3번이나 지웠다 깔았다. 너무 힘들었고 시간도 오래걸렸다.<br>
!: JSP를 다뤄봐서 좋았다. 이클립스에서 바로 웹페이지가 나오는게 신기하고 편했다.<br>
</P>
<h1>동작 영상</h1>
<a href = "https://youtu.be/kLphk9HI7M4" >동작 영상 링크</a>
<-수정기능과 삭제기능 추가
</html>
