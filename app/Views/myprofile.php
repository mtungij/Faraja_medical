<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>
<div class="flex justify-end">
<a href="<?= site_url("profile-picture")?>" type="button" class="text-white bg-blue-700 w-48  hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Change Profile Picture</a>
</div>
<section>
    <form action="<?= site_url('password/reset') ?>" method="post" class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <?= csrf_field() ?>
    <input type="hidden" name="_method" value="PATCH">
        <div class="md:col-span-3">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Old Password</label>
            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" placeholder="****" required>
        </div>
    
        <div>
            <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
            <input type="password" id="new_password" name="new_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" placeholder="****" required>
        </div>

        <div>
            <label for="new_password_confirm" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm New Password</label>
            <input type="password" id="new_password_confirm" name="new_password_confirm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" placeholder="****" required>
        </div>

        <div class="w-full flex col-span-2 justify-center">
            <button type="submit" class="text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">Change Password</button>
        </div>
    </form>
</section>
  
<?= $this->endSection() ;?>