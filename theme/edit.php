
<fieldset>
  <?php foreach ($article_edit as $edit):
    for ($i = 0 ; $i < count($edit); $i++): ?>
      <form method="POST">
        <input type="hidden" name="id" value="<?php echo $edit["$i"]['id']?>"><br>
        Название статьи: <input type="text" name="name" value="<?php echo $edit["$i"]['name']?>"><br><br>
        Дата: <input type="date" name="date" value="<?php echo $edit["$i"]['date']?>"><br><br>
        Статья: <textarea name="content" rows="5" ><?php echo $edit["$i"]['content']?></textarea><br>
        <input type="submit" name="submit" value="Сохранить">
      </form>
    <?php  endfor?>
  <?php endforeach?>
</fieldset>
