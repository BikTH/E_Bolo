
<?php
include("../models/db.php");
if (!empty($_POST["Keyword"])) :
    echo "<script>alert()</script>";
    $request = $db->query("select * from users where userName like '{$_POST["Keyword"]}%' order by userName limit 0,6");
    $request1 = $db->query("select * from users where userName like '{$_POST["Keyword"]}%' order by userName limit 0,6");
    $result1 = mysqli_fetch_assoc($request);
    if (!empty($result1)) :
?>
        <ul id="userName" class="list-unstyled">
            <?php
            while ($result = mysqli_fetch_assoc($request1)) :
                   
            ?>
                <li class="nav-item dropdown" aria-labelledby="suggestion-box">
                    <ul>
                        <li class="dropdown-item" onclick="selectCountry('<?php echo $result['userName']; ?>');"><?php echo $result['userName']." ".$result["userSecondName"] ?></li>
                    </ul>
                </li>

            <?php endwhile ?>
        </ul>
    <?php endif ?>
<?php endif ?>