<tr>
    <td><input type="text" class="admin_changes" value="Firstname" disabled></td>
    <td><input type="text" class="admin_changes" value="Lastname" disabled></td>
    <td><input type="text" class="admin_changes" value="Nickname" disabled></td>
    <td><input type="text" class="admin_changes" value="Email" disabled></td>
    <td class="admin_control one">
        <form method="post">
            <input type="submit" class="admin_changes" name="save" value="Сохранить">
            <input type="submit" class="admin_changes" name="del" value="Удалить">
        </form>
    </td>
</tr>

if(isset($_SESSION))
    session_start();