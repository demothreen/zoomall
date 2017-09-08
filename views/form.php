<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Зоомагазин</title>
</head>
<body>
<H1>Это зоомагазин</H1>
<form method="post">
    <label>Что ищем?</label>
    <input type="text" name="name" placeholder="Введите запрос"><br>
    <select name="category">
    <option>Выберите категорию</option>
        <option value="enimal">Животное</option><br>
        <option value="food">Корм</option><br>
        <option value="product">Сопутствующий товар</option><br>
    </select><br><br>
    <label>Выберите подкатегорию</label><br>
    <input type="checkbox" name="sub[rodent]">грызуны
    <input type="checkbox" name="sub[amphibia]">земноводные
    <input type="checkbox" name="sub[reptile]">рептилии
    <input type="checkbox" name="sub[fish]">рыбы
    <input type="checkbox" name="sub[cat]">кошки
    <input type="checkbox" name="sub[dog]">собаки<br>
    <input type="submit" name="submit" value="Отправить">
</form>
</body>
</html>
