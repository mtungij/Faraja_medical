

<!-- Modal toggle -->

<button data-modal-target="appointment" data-modal-toggle="appointment" type="button" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
<svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
</svg>
Add Appointment
</button>

<!-- Main modal -->
<div id="appointment" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <form action="<?= site_url("patients/$patient->id/appointments")?> " method="post" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <?= csrf_field() ?>
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Create Appointment
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="appointment">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <section class="bg-white dark:bg-gray-900">
  <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
      <form action="#" class="space-y-8">
          <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Assign To</label>
            <select id="countries" name="receiver_id"  data-te-select-init data-te-select-filter="true" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <?php foreach ($user as $value) : ?>
                  <option value="<?= $value->id?>"><?=$value->name  ."  ". $value->department ?></option>
                <?php endforeach ?>
            </select>
          </div>
          <div class="my-4">
              <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Appointment Date</label>
              <input type="date" name="date"   id="subject" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Let us know how we can help you" required>
          </div>
          <div class="sm:col-span-2">
          <div id="editor"></div>
         <input type="hidden" name="desc" value="" id="editorContent">
          </div>
          <div class="sm:col-span-2 ">
          <input type="hidden" name="patient_id" value="<?= $patient->id ?>">
                <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>"
            </div>

          <button type="submit" class="py-3 my-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Save</button>
      </form>
  </div>
</section>
         
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
