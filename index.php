<?php include('header.php'); ?>

<div class="row justify-content-center">
    <div class="col-md-6">

        <h1 class="mb-4 text-center">Descubra seu signo</h1>

        <div class="card p-4 shadow">

            <form method="POST" action="show_zodiac_sign.php">

                <div class="mb-3">
                    <label class="form-label">Data de nascimento:</label>
                    <input type="date" name="data_nascimento" class="form-control" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        Consultar signo
                    </button>
                </div>

            </form>

        </div>

    </div>
</div>

</body>
</html>
