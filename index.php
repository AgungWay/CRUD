<body>
    <?php include "./layout/nav.php" ?>
    <?php include "./tabelMhs.php" ?>

    <script src="./public/js/bootstrap.min.js"></script>
    <script src="./public/js/jquery-3.7.0.min.js"></script>
    <script src="./public/js/jquery.dataTables.min.js"></script>
    <script src="./public/js/dataTables.bootstrap5.min.js"></script>

    <script>
        new DataTable('#dataMhs');
    </script>
    <footer class="fixed-bottom">
        <div class="card-footer bg-dark ">
            <small class="text-muted" style="font-family : Oswald; font-size :small"> Copyright © 2023 - 2024 Agung’s co. </small>
        </div>
    </footer>
</body>

</html>