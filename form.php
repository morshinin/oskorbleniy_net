<?php include_once('header.php'); ?>
<div class="mt-5 md:mt-0 md:col-span-2">
    <form action="/process.php" method="POST">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div>
                    <label for="about" class="block text-sm font-medium text-gray-700">
                        Оскорбление
                    </label>
                    <div class="mt-1">
                        <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500
                        focus:border-indigo-500 mt-1 block w-96 sm:text-sm border-gray-300 rounded-md"
                                  placeholder="Писать здесь..."></textarea>
                    </div>

                </div>
            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Добавить оскорбление
            </button>
        </div>
    </form>
</div>
<?php include_once('footer.php'); ?>