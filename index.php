<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP database example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    error_reporting(E_ERROR);
    require('database.php');
    $db = new db();

    $drivers = $db->selectAll('driver');

    ?>
    <div class="container justify-content-center text-center">
        <header class="my-3">
            <h1>F1 versenyzők 2025</h1>
        </header>
        <main>

        <hr>
            <div class="p-5">
                <form action="newdriver.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="firstName" placeholder="firstName" name="firstName">
                        <label for="firstName">Keresztnév</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="lastName" placeholder="lastName" name="lastName">
                        <label for="lastName">Vezetéknév</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nationality" placeholder="Nemzetiség" name="nationality">
                        <label for="nationality">Nemzetiség</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="number" placeholder="Versenyszám" name="number">
                        <label for="number">Versenyszám</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="teamId" placeholder="Csapatnév" name="teamId">
                        <label for="teamId">Csapatnév</label>
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" id="rookie" name="rookie" class="">
                        <label for="rookie">Újonc</label>
                    </div>

                    <input type="submit" value="Mentés" class="btn btn-outline-secondary" name="saveBtn">
                </form>
            </div>

            <hr>


            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Nemzetiség</th>
                        <th>Versenyszám</th>
                        <th>Csapatnév</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    <?php foreach ($drivers as $driver) : ?>
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td><?php echo $driver['firstName'] . ' ' . $driver['lastName']; ?></td>
                            <td><?php echo $driver['nationality']; ?></td>
                            <td><?php echo $driver['number']; ?></td>
                            <td><?php echo $driver['teamId']; ?></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                </tfoot>
                <tr>
                    <td colspan="5">Összesen: <strong><?php echo count($drivers); ?></strong> versenyző</td>
                </tr>


            </table>
        </main>

        <footer>BSZC Türr - 13.A szoft</footer>
    </div>
</body>

</html>