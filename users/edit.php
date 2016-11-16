<?php
require_once ('../app.php');
$user = $dataConnect->findUser($UserId);
?>

<div style="height:50px; background-color:transparent"></div>
<div style="background-color: brown; margin-bottom: 15px">
    <p style="font-family: 'Times New Roman'; font-size: 40px; font-style: italic; color: white">ユーザー情報の編集</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="bs-docs-section">

                <!--フォーム-->
                <form method="POST" action="/users/exec.php/<?php echo $UserId ?>">
                    <div class="form-group">
                        <input required="required" class="form-control" placeholder="メールアドレスを入力" name="email" type="text">
                    </div>
                    <div class="form-group">
                        <input required="required" class="form-control" placeholder="ニックネームを入力" name="nickname" type="text">
                    </div>
                    <button type="submit">更新する</button>
                </form>

            </div>
        </div>
    </div>
</div>
<div style="height:30px; background-color:transparent"></div>