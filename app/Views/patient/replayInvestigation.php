
<?= $this->extend('patientLayout') ;?>

<?= $this->section('patient') ;?>

<section class="bg-gray-50 dark:bg-gray-900">
    <header>
        <h2 class="text-2xl font-bold my-3">Replay Investigation</h2>
    </header>
    <?php if(session('val_errors')): ?>
        <ul>
            <?php foreach(session('val_errors') as $key => $error): ?>
                <li class="text-red-500"><?= $error ?></li>
            <?php endforeach ;?>
        </ul>
    <?php endif ;?>

    <div class="">
       <?= $this->include('patient/partials/replayInvestigation') ;?> 
    </div>
</section>

<?= $this->endSection() ;?>