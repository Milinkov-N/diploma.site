<div class="wrapper">
    <form method="post" id="edit_name" name="edit_name">
        <h1>Имя</h1>
        <div class="input-group">
            <input name="uid" value="<?php echo $_SESSION["user_id"] ?>" hidden>
            <input type="text" name="name" id="name" placeholder="<?php echo $_SESSION["name"] ?>">
            <button type="submit" class="edit-btn">Сохранить</button>
        </div>              
    </form>
    <form method="post" id="edit_surname" name="edit_surname">
        <h1>Фамилия</h1>
        <div class="input-group">
            <input name="uid" value="<?php echo $_SESSION["user_id"] ?>" hidden>
            <input type="text" name="surname" id="surname" placeholder="<?php echo $_SESSION["surname"] ?>">
            <button type="submit" class="edit-btn">Сохранить</button>
        </div>             
    </form>
    <form method="post" id="edit_group" name="edit_group">
        <h1>Группа</h1>
        <div class="input-group">
            <input name="uid" value="<?php echo $_SESSION["user_id"] ?>" hidden>
            <select name="group" id="group" class="group" required>
                <option value="" disabled selected hidden><?php echo $_SESSION["group"] ?></option>
                <option value="П-21">П-21</option>
                <option value="П-22">П-22</option>
                <option value="П-31">П-31</option>
                <option value="П-32">П-32</option>
            </select>
            <button type="submit" class="edit-btn">Сохранить</button>
        </div>
    </form>
    <form method="post" id="edit_email" name="edit_email">
        <h1>Эл. почта</h1>
        <div class="input-group">
            <input name="uid" value="<?php echo $_SESSION["user_id"] ?>" hidden>
            <input type="email" name="email" id="email" placeholder="<?php echo $_SESSION["login"] ?>">
            <button type="submit" class="edit-btn">Сохранить</button>
        </div>
    </form>
    <form method="post" id="edit_password" name="edit_password">
        <h1>Пароль</h1>
        <div class="input-group">
        <input name="uid" value="<?php echo $_SESSION["user_id"] ?>" hidden>
            <input type="password" name="password" id="password" placeholder="<?php echo $_SESSION["password"] ?>">
            <button type="submit" class="edit-btn">Сохранить</button>
        </div>
    </form>
</div>