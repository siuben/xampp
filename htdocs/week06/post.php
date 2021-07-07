<!Doctype html>
<html lang="zh-TW">
<HEAD>
    <meta charset="utf-8" />
    <title>傳送資料</title>
</head>
<body>
    <form method="POST" action="showpost.php">
    <div>標題:<input type="text" name="title"></div>
    <div>分類:
        <select name="category">
            <option value="最新消息">最新消息</option>
            <option value="個人作品">個人rty作品</option>
        </select>
    </div>
    <div>內文: <textarea name="content" placeholder="請輸入內容" rows="8" cols="77"></textarea name></div>
    <div>
        <label><input type="radio" name="publish" value="1">發佈</label>
        <label><input type="radio" name="publish" value="0">不發佈</label>
    </div>
    <div>
        <label><input type="checkbox" name="keyword[]" value="php">php</label>
        <label><input type="checkbox" name="keyword[]" value="html">html</label>
        <label><input type="checkbox" name="keyword[]" value="css">css</label>
        <label><input type="checkbox" name="keyword[]" value="javascript">javascript</label>
    </div>
    <div>
    <input type="date" name="date" placeholder="生日">
    </div>
    <div>
    <input type="email" name="email" placeholder="請輸入電郵地址">
    </div>
    <div>
    <input type="file" name="myfile" accept="*">
    </div>
    <button type="submit">送出</button>
    <button type="reset">清除</button>
    </form>
</body>
</html>