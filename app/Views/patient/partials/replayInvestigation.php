
<!-- Main modal -->
<div class="overflow-y-auto overflow-x-hidden justify-center items-start w-full md:inset-0 max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <form action="<?= site_url("patients/$patient->id/investigations/$investigation->id/update") ?>" method="post" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <?= csrf_field() ?>
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <div id="editor"></div>
                <input type="hidden" name="result" value="" id="editorContent">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="replied_by" value="<?= session()->get('user_id') ?>">
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit" class="text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">Submit</button>
                <a href="<?= site_url("patients/$patient->id/investigations") ?>" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-sky-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</a>
            </div>
       </form>
    </div>
</div>

<script>
    //query the first element from the editor

    const editor = document.querySelector('#editor');
    
    editor.addEventListener('keyup', () => {
        const editorContent = document.getElementById('editorContent')

        const qlEditor = document.querySelector('.ql-editor')
        editorContent.value = qlEditor.innerHTML

        // console.log(qlEditor.innerHTML);
        console.log(editorContent.value)
    });

</script>
