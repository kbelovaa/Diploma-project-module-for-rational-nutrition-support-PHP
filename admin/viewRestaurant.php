<div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Рестораны
                    </h1>

                </div>
            </div>

            <?php
            if(isset($_SESSION['valid'])==True){?>
            <div class="row">

                <div class="col-lg-6" style="width: 100%">
                    <h2>Информация о ресторанах</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Название ресторана</th>
                                    <th>Район</th>
                                    <th>Продажи</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql = "select * from restaurant";

                                $result = mysqli_query($conn,$sql);

                                $response = array();
                                $count = 0;

                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "<tr>
                                    <td>".$row[1]."</td>
                                    <td>".$row[2]."</td>
                                    <td>".$row[3]." руб</td>
                                    <td><form method=\"post\" action=\"delete.php\"><a href=\"deleteR.php?id=".$row['0']."\" class=\"delete\"><input type=\"button\" class=\"btn btn-default\" value=\"Удалить\"></a></form></td>
                                </tr>";
                                $count++;
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>