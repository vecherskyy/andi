<?
use yii\helpers\Html;
?>
<div class="post-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <div class="row">
        <div class="col-xs-6">
            <form action="">
                Author <br/>
                <input type="text" name="author"/><br/>
                Title <br/>
                <input type="text" name="title"/><br/>
                Description <br/>
                <textarea name="description" id="" cols="30" rows="3"></textarea><br/>
                Content <br/>
                <textarea name="content" id="" cols="30" rows="10"></textarea>
            </form>
            <?=Html::button('Save',['id' => 'send']) ?>
        </div>
        <div class="col-xs-6">
            <div>
                <?//=Html::button('News', ['id' =>'news']) ?>
            </div>

            <div id="news"></div>
        </div>
    </div>


</div>
