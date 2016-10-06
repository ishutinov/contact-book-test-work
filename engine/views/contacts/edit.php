<h2><?php echo $this->title; ?></h2>
<?php foreach($this->ContactDetails as $key=>$value):?>
<form method="post" enctype="multipart/form-data" class="form-horizontal">
<?php if($this->msg == "Success") { ?>
<div class="alert alert-success" role="alert">Контакт успешно сохранен.</div>
<?php } elseif($this->msg == "FieldsIsSmall") { ?>
<div class="alert alert-danger" role="alert">Возникла ошибка, значение полей слишком короткое.</div>
<?php } elseif($this->msg == "FieldsIsLimit") { ?>
<div class="alert alert-danger" role="alert">Возникла ошибка, Вы превысили максимальное значение поля.</div>
<?php } elseif($this->msg == "FieldsIsNotCorrect") { ?>
<div class="alert alert-danger" role="alert">Возникла ошибка, введите корректные данные.</div>
<?php } elseif($this->msg == "FieldsIsEmpty") { ?>
<div class="alert alert-danger" role="alert">Возникла ошибка, заполните все поля.</div>
<?php } ?>
<div class="form-group">
<label class="col-sm-2 control-label">Имя</label>
<div class="col-sm-7">
<input type="text" class="form-control" placeholder="имя" name="name" value="<?php echo $value->name; ?>" required autofocus>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Описание</label>
<div class="col-sm-7">
<input type="text" class="form-control" placeholder="описание" name="description" value="<?php echo $value->description; ?>" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Номер телефона</label>
<div class="col-sm-7">
<input type="text" class="form-control" placeholder="номер телефона" name="phone" value="<?php echo $value->phone; ?>" required>
</div>
</div>
<div class="form-group">
<div class="col-xs-offset-2 col-xs-10">
<button type="submit" class="btn btn-success">Сохранить</button>
</div>
</div>
</form>
<?php endforeach; ?>
