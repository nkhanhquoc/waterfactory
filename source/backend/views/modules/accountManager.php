<div class="info-diagram">
    <div class="check-account">
        <form id="manager-form" method="post" action="/index.php/modules/accountmanager?id=<?php echo $model->id ?>">
<<<<<<< HEAD
          <input type="hidden" name="_csrf" value="<?php Yii::$app->request->csrfToken ?>">
          <input type="hidden" name="check" value="1">
          <input type="hidden" id="module-id" value="<?php echo $model->id ?>">
          <h3 class="title">ID: <?php echo $model->id ?></h3>
          <div class="row-check-account">
  		          <a href="javascript:void(0)" class="link" onclick="$('#manager-form').submit()">Check <br>Account</a>
    		      <div class="content">
              	<div class="text-02">Số tiền còn lại trong tài khoản của bạn là : <strong id="money-info"><?php echo number_format($model->money) ?></strong> đ</div>
              </div>
          </div>
          <div class="row-check-account">
        		  <a href="javascript:void(0)" onclick="$('#manager-form').submit()" class="link">Check <br>Data</a>
        		  <div class="content">
           	 <div class="text-02">Data con lại của bạn là : <strong id="data-info"><?php echo number_format($model->data) ?></strong> KB</div>
            </div>
          </div>
        </form>
          <form action="/index.php/modules/accountmanager?id=<?php echo $model->id ?>" id="pay_card_form" method="post">
=======
>>>>>>> 15743d75ae1c793f8bd03f169c62944776a59828
            <input type="hidden" name="_csrf" value="<?php Yii::$app->request->csrfToken ?>">
            <input type="hidden" name="check" value="1">
            <input type="hidden" id="module-id" value="<?php echo $model->id ?>">
            <h3 class="title">ID: <?php echo $model->getModuleId() . ' - ' . \yii\helpers\Html::encode($model->name); ?></h3>
            <div class="row-check-account">
                <span class="link" onclick="$('#manager-form').submit()">Check <br>Account</span>
                <div class="content">
                    <div class="text-02">Số tiền còn lại trong tài khoản của bạn là : <strong id="money-info"><?php echo number_format($model->money) ?></strong> đ</div>
                </div>
            </div>
            <div class="row-check-account">
                <a href="#" class="link">Check <br>Data</a>
                <div class="content">
                    <div class="text-02">Data con lại của bạn là : <strong id="data-info"><?php echo number_format($model->data) ?></strong> KB</div>
                </div>
            </div>
            <form>
                <form action="/index.php/modules/accountmanager?id=<?php echo $model->id ?>" id="pay_card_form" method="post">
                    <input type="hidden" name="_csrf" value="<?php Yii::$app->request->csrfToken ?>">
                    <input type="hidden" name="pay" value="1">
                    <div class="row-check-account">
                        <button class="link" onclick="return checkCard()">Change <br>Account</button>
                        <div class="content">
                            <div class="text-02">
                                <input type="text" id="card_info" name="card_info" placeholder="Enter your code" class="text-field">
                            </div>
                        </div>
                    </div>
                </form>
                </div>

                </div>
                <?php if ($alert): ?>
                    <script type="text/javascript">
                        alert('<?php echo $alert ?>')
                    </script>
                <?php endif; ?>
                <script type="text/javascript">

                    function loadInfo() {
                        console.log("reload module data");
                        var id = $("#module-id").val();

                        $.get("/modules/loadinfo?id=" + id, {}, function (values) {
                            console.log(values);
                            // var values = JSON.parse(data);
                            $("#money-info").html(values.money);
                            $("#data-info").html(values.data);
                        });

                    }

                    setInterval(function () {
                        console.log("auto reload module data");
                        var id = $("#module-id").val();

                        $.get("/modules/loadinfo?id=" + id, {}, function (values) {
                            console.log(values);
                            // var values = JSON.parse(data);
                            $("#money-info").html(values.money);
                            $("#data-info").html(values.data);
                        });

                    }, 10000);

                    function updateModuleInput() {
                        $('#module-id').val($('#module_id').val());
                        loadInfo();
                    }

                    function checkCard() {
                        var card = $('#card_info').val();
                        if (card.length < 12 || card.length > 16) {
                            alert("Mã thẻ cào chưa chính xác!");
                            $('#card_info').focus();
                            return false;
                        }

                        if (!$.isNumeric(card)) {
                            alert("Mã thẻ cào chưa chính xác!");
                            $('#card_info').focus();
                            return false;
                        }
                        $('#pay_card_form').submit();
                    }
                </script>
