<div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Продажи
                    </h1>

                </div>
            </div>

            <?php
            if(isset($_SESSION['valid'])==True){?>
            <div class="row">

                <div class="col-lg-6" style="width: 100%">

                <form action="" method="get">
                    <label>From: </label>
                    <input type="Date" name="bdate" required>
                    <label style="margin-left: 30px;">To: </label>
                    <input type="Date" name="edate" required>
                    <label style="margin-left: 30px;">Ресторан: </label>
                    <select name="restaurant">
                        <option selected disabled>Выберите ресторан</option>

                        <?php
                        $sql = "select * from restaurant";

                        $result = mysqli_query($conn,$sql);

                        while($row = mysqli_fetch_array($result))
                        {
                            echo "
                            <option>".$row[1]."</option>";
                        }

                        ?>
                    </select>
                    <input type="text" style="display: none;" name="adp" value = "6">
                    <input type="submit" name="submit" style="margin-left: 30px;" value="Просмотреть">
                </form>

                    <?php
                    if ((isset($_GET['bdate']) != 0) && (isset($_GET['edate']) != 0) && (isset($_GET['restaurant']) != 0))
                        {
                    ?>
                        
                    <h2>Информация о продажах</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Название ресторана</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Сумма продаж</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php
                                        echo "$_GET[restaurant]";
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo "$_GET[bdate]";
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo "$_GET[edate]";
                                        ?>
                                    </td>
                                    <td>
                                <?php
                                $result = 0;
                                $sql=mysqli_query($conn,"SELECT sell FROM sells WHERE restaurant='".$_GET['restaurant']."' AND DATE BETWEEN '".$_GET['bdate']."' and '".$_GET['edate']."'");
                                while($row=mysqli_fetch_array($sql))
                                {
                                    $result = $result+$row['sell'];                                    
                                }
                                echo $result." руб";

                            ?>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
    }
}
    ?>
</div>