<h2><?php echo $this->title; ?></h2>
<table id="contactlist" class="table table-bordered">
<tr class="active">
<th>имя</th>
<th>номер телефона</th>
<th>Описание</th>
<th><i class="glyphicon glyphicon-edit"></i>
<i class="glyphicon glyphicon-remove-circle"></i></th>
</tr>
<?php foreach($this->ContactsList as $key => $value):?>
<tr id="<?php echo $value->id; ?>">
<td><?php echo $value->name; ?></td>
<td><?php echo $value->phone; ?></td>
<td><?php echo $value->description; ?></td>
<td><a title="Редактировать запись" href="/contacts/edit/<?php echo $value->id; ?>"><i class="glyphicon glyphicon-edit"></i></a>
<!--
<a title="Удалить запись" id="delContact" onClick="return window.confirm('Точно удалить?');" href="/contacts/delete/<?php echo $value->id; ?>"></a></td>
-->
<a href="javascript:void(0);" class="test" id="<?php echo $value->id; ?>" onClick="return window.confirm('Точно удалить?');"><i class="glyphicon glyphicon-remove-circle"></i></a>
</tr>
<?php endforeach; ?>
</table>
