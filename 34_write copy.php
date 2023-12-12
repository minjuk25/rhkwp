<?php
include'0_header.php';?>
 <style>
 h1{color: #73be6c;}
 #main{width:600px;height:800px;border-radius:10px;border:thin solid #ddaa77;opacity:0.6;margin:50px}
  label{margin: 5px;padding:10px;
	   font-family:serif;font-size:1.2em;
	   color:#505050;}
  input{padding:7px}
  textarea{margin-left:10px;}
 </style>
 </head>

 <body>
 <h1>woodpia 게시판 글쓰기</h1>
 <form action="34_write.php" method="post">
 <section id="main">
 <br>
 <label>이름</label><input type="text" required name="nicname"><p>
 <label>아이디</label><input type="text" required name="id"><p>
 <label>비밀번호</label><input type="password" length=5 required name="pwd"><p>

 <select name="shopname" class="txtbox">
    <option selected> </option>
    <?php
    $connect = mysqli_connect("localhost", "root", "", "bab");
    
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $query = "SELECT shopname FROM shop";
    $stmt = mysqli_prepare($connect, $query);
    
    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($connect));
    }
    
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
        $nation = $row['shopname'];
    ?>
        <option value="<?= $nation ?>"><?= $nation ?></option>
    <?php
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
    ?>
</select>
 <!--<label>제목</label><input type="text" required name="shopname"><p>-->
 <!--<select name="shopname">
    <option value=""></option>
    <option value="모도리">모도리</option>
 </select></label><p>-->
 <label>글내용</label><textarea rows=10 cols=70 required name="content"></textarea>
 <input type="submit" value="등록하기"></section>
 </form>
 </body>
</html>