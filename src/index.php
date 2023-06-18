<?php
if(isset($_POST)) {
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>Upload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://sdk.amazonaws.com/js/aws-sdk-2.840.0.min.js"></script>
</head>

<body>
    <h1 style="text-align:center; margin-top: 100px;"> POSSE Submission </h1>
    <form enctype="multipart/form-data" action="s3upload.php" method="POST" style="width: 500px; margin: 10px auto;">
        <div class="form-group" style="width: 500px;">
            <label for="grade">学年</label>
            <!-- selectタグ その① -->
            <select name="posse-gen" class="form-control" id="grade">
                <option value="ull">--期生選択--</option>
                <option value="1.0" class="gen1.0">1.0期生</option>
                <option value="1.5" class="gen1.5">1.5期生</option>
                <option value="2.0" class="gen2.0">2.0期生</option>
            </select>
        </div>

        <div class="form-group" style="width: 500px;">
            <label for="file_name">氏名</label>
            <!-- selectタグ その② -->
            <select name="member-list" class="form-control" id="name">
                <option class="gen1.0 gen1.5">--名前選択--</option>
                <!-- 五十音順に並べること -->
                <option value="石井潤" class="gen1.0">石井潤</option>
                <option value="林千翼子" class="gen1.0">林千翼子</option>
                <option value="森遥" class="gen1.0">森遥</option>
                <option value="湯山智晴" class="gen1.0">湯山智晴</option>
                <option value="吉岡秀都" class="gen1.0">吉岡秀都</option>
                <option value="穴田竜大" class="gen1.5">穴田竜大</option>
                <option value="影嶋亮太朗" class="gen1.5">影嶋亮太朗</option>
                <option value="小堺真季子" class="gen1.5">小堺真季子</option>
                <option value="佐藤大暉" class="gen1.5">佐藤大暉</option>
                <option value="高梨彩音" class="gen1.5">高梨彩音</option>
                <option value="高橋日菜" class="gen1.5">高橋日菜</option>
                <option value="多田星凜" class="gen1.5">多田星凜</option>
                <option value="檀野太紀" class="gen1.5">檀野太紀</option>
                <option value="新島駿" class="gen1.5">新島駿</option>
                <option value="三木晴加" class="gen1.5">三木晴加</option>
                <option value="山本陽南子" class="gen1.5">山本陽南子</option>
                <option value="山寺伶奈" class="gen2.0">山寺伶奈</option>
                <option value="平野隆二" class="gen2.0">平野隆二</option>
                <option value="宮地佐知" class="gen2.0">宮地佐知</option>
                <option value="藤間裕史" class="gen2.0">藤間裕史</option>
                <option value="田中陽平" class="gen2.0">田中陽平</option>
                <option value="藤吉彩花" class="gen2.0">藤吉彩花</option>
                <option value="二宮駿" class="gen2.0">二宮駿</option>
                <option value="冨永桃" class="gen2.0">冨永桃</option>
                <option value="加茂竜之介" class="gen2.0">加茂竜之介</option>
                <option value="大須賀博紀" class="gen2.0">大須賀博紀</option>
                <option value="千羽茉莉愛" class="gen2.0">千羽茉莉愛</option>
                <option value="石川朝香" class="gen2.0">石川朝香</option>
                <option value="中澤和貴" class="gen2.0">中澤和貴</option>
                <option value="藤原千那美" class="gen2.0">藤原千那美</option>
                <option value="武田龍一" class="gen2.0">武田龍一</option>
                <option value="古屋美羽" class="gen2.0">古屋美羽</option>
                <option value="窪田美怜" class="gen2.0">窪田美怜</option>
                <option value="中村綾花" class="gen2.0">中村綾花</option>
                <option value="国本大輝" class="gen2.0">国本大輝</option>
                <option value="西川航平" class="gen2.0">西川航平</option>
                <option value="戸塚天海" class="gen2.0">戸塚天海</option>
                <option value="渡邉瑛貴" class="gen2.0">渡邉瑛貴</option>
                <option value="稲葉恭並" class="gen2.0">稲葉恭並</option>
                <option value="横田菜々子" class="gen2.0">横田菜々子</option>
                <option value="本城裕大" class="gen2.0">本城裕大</option>
                <option value="増田浩人" class="gen2.0">増田浩人</option>
                <option value="青柳仁" class="gen2.0">青柳仁</option>
                <option value="宮地佑果" class="gen2.0">宮地佑果</option>
                <option value="鹿島健太" class="gen2.0">鹿島健太</option>
                <option value="松本透歩" class="gen2.0">松本透歩</option>
                <option value="西山直輝" class="gen2.0">西山直輝</option>
                <option value="金子夏蓮" class="gen2.0">金子夏蓮</option>
                <option value="小林哲" class="gen2.0">小林哲</option>
                <option value="水城菜月" class="gen2.0">水城菜月</option>
                <option value="小野寛太" class="gen2.0">小野寛太</option>
                <option value="田上黎" class="gen2.0">田上黎</option>
                <option value="辻勇志" class="gen2.0">辻勇志</option>
            </select>
        </div>

        <div class="form-group" style="width: 500px;">
            <label for="filegroup">提出物種別</label>
            <select name="filegroup" class="form-control" id="filegroup">
                <option value="1st-quizyリーディング">ph1-quizyリーディング</option>
            </select>
        </div>

        <div class="form-group" style="width: 500px;">
            <label for="file_name">提出物指定</label>
            <div class="custom-file" style="width: 500px;">
                <label for="file_name">提出物指定</label>
                <label class="custom-file-label" for="file">ファイル選択</label>
                <input type="file" class="custom-file-input" id="file" name="file" onchange="bsCustomFileInput.init()">
                <input type="hidden" id="filename">
            </div>
        </div>
        <button type="submit" class="btn btn-primary" style="margin: 10px auto;">送信</button>
    </form>

    <!-- jQueryのCDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(function() {

            //《selectタグ その①》期生欄を選択すると呼び出される関数
            $('select[name="posse-gen"]').change(function() {

                //《selectタグ その①》nameの値を取得
                var gen_class = $('select[name="posse-gen"] option:selected').attr("class");
                console.log(gen_class);

                //《selectタグ その②》 子要素タグの個数を数え上げ
                var count = $('select[name="member-list"]').children().length;
                console.log(count);

                for (a = 0; a < count; a++) {

                    var member_names = $('select[name="member-list"] option:eq(' + a + ')');

                    //《selectタグ その①》で選択した路線と等しいname値を持つoptionタグを表示
                    if (member_names.attr("class") === gen_class) {
                        member_names.show();
                    } else {
                        member_names.hide();
                    }
                }

            });

        });
    </script>
</body>

</html>