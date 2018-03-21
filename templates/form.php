<div class="modal">
  <button class="modal__close" type="button" name="button">Закрыть</button>

  <h2 class="modal__heading">Добавление задачи</h2>

  <form class="form"  action="index.php" method="post" enctype="multipart/form-data">
    <div class="form__row">
      <label class="form__label" for="name">Название <sup>*</sup></label>
	 <p class="form__message"><?=(isset($errors['name']) ? "$errors[name]" : "")?></p>
      <input class="form__input <?=(isset($errors['name']) ? "form__input--error": "")?>" type="text" name="name" id="name" value="" placeholder="Введите название">
    </div>

    <div class="form__row">
      <label class="form__label" for="project">Проект <sup>*</sup></label>
      <p class="form__message"><?=(isset($errors['project']) ? "$errors[project]" : "")?></p>
      <select class="form__input form__input--select <?=(isset($errors['project']) ? "form__input--error": "")?>" name="project" id="project">
	  <option value=""></option>
        <?php foreach ($projects_main as $key):?>
		<option value="<?=$key?>"><?=$key?></option>
		<?php endforeach;?> 
      </select>
    </div>

    <div class="form__row">
      <label class="form__label" for="date">Дата выполнения</label>
      
      <input class="form__input form__input--date " type="date" name="date" id="date" value="" placeholder="Введите дату в формате ДД.ММ.ГГГГ">
    </div>

    <div class="form__row">
      <label class="form__label" for="preview">Файл</label>

      <div class="form__input-file">
        <input class="visually-hidden" type="file" name="preview" id="preview" value="">

        <label class="button button--transparent" for="preview">
            <span>Выберите файл</span>
        </label>
      </div>
    </div> 

    <div class="form__row form__row--controls">
      <input class="button" type="submit" name="add" value="Добавить">
    </div>
  </form>
</div>
