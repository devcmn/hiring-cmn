{{-- Additional Questions Section --}}
<div class="space-y-6">
    <div class="border-b border-gray-200 pb-4">
        <h2 class="text-xl font-bold text-gray-900 flex items-center">
            <svg class="w-6 h-6 mr-2 text-primary-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Additional Questions
        </h2>
        <p class="text-sm text-gray-600 mt-1">Please answer the following questions honestly and completely</p>
    </div>

    {{-- Question 1 --}}
    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
        <label class="block text-sm font-semibold text-gray-900 mb-3">
            1. Apakah Anda pernah melamar di group/perusahaan ini sebelumnya? Bilamana dan sebagai apa?
            <span class="text-red-500">*</span>
        </label>
        <div class="flex gap-4 mb-3">
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="question_1_answer" value="yes" required
                    class="w-4 h-4 text-primary-900 border-gray-300 focus:ring-primary-900"
                    onchange="toggleExplanation('question_1', true)">
                <span class="ml-2 text-sm text-gray-700">Ya</span>
            </label>
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="question_1_answer" value="no"
                    class="w-4 h-4 text-primary-900 border-gray-300 focus:ring-primary-900"
                    onchange="toggleExplanation('question_1', false)">
                <span class="ml-2 text-sm text-gray-700">Tidak</span>
            </label>
        </div>
        <div id="question_1_explanation" class="hidden">
            <textarea name="question_1_explanation" rows="2"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-900 focus:border-transparent text-sm"
                placeholder="Jelaskan..."></textarea>
        </div>
    </div>

    {{-- Question 2 --}}
    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
        <label class="block text-sm font-semibold text-gray-900 mb-3">
            2. Selain di sini di perusahaan mana lagi Anda melamar waktu ini? Sebagai apa?
            <span class="text-red-500">*</span>
        </label>
        <div class="flex gap-4 mb-3">
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="question_2_answer" value="yes" required
                    class="w-4 h-4 text-primary-900 border-gray-300 focus:ring-primary-900"
                    onchange="toggleExplanation('question_2', true)">
                <span class="ml-2 text-sm text-gray-700">Ya</span>
            </label>
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="question_2_answer" value="no"
                    class="w-4 h-4 text-primary-900 border-gray-300 focus:ring-primary-900"
                    onchange="toggleExplanation('question_2', false)">
                <span class="ml-2 text-sm text-gray-700">Tidak</span>
            </label>
        </div>
        <div id="question_2_explanation" class="hidden">
            <textarea name="question_2_explanation" rows="2"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-900 focus:border-transparent text-sm"
                placeholder="Sebutkan perusahaan dan posisi..."></textarea>
        </div>
    </div>

    {{-- Question 3 --}}
    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
        <label class="block text-sm font-semibold text-gray-900 mb-3">
            3. Apakah Anda terikat kontrak dengan perusahaan tempat kerja Anda saat ini?
            <span class="text-red-500">*</span>
        </label>
        <div class="flex gap-4 mb-3">
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="question_3_answer" value="yes" required
                    class="w-4 h-4 text-primary-900 border-gray-300 focus:ring-primary-900"
                    onchange="toggleExplanation('question_3', true)">
                <span class="ml-2 text-sm text-gray-700">Ya</span>
            </label>
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="question_3_answer" value="no"
                    class="w-4 h-4 text-primary-900 border-gray-300 focus:ring-primary-900"
                    onchange="toggleExplanation('question_3', false)">
                <span class="ml-2 text-sm text-gray-700">Tidak</span>
            </label>
        </div>
        <div id="question_3_explanation" class="hidden">
            <textarea name="question_3_explanation" rows="2"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-900 focus:border-transparent text-sm"
                placeholder="Jelaskan detail kontrak..."></textarea>
        </div>
    </div>

    {{-- Question 4 --}}
    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
        <label class="block text-sm font-semibold text-gray-900 mb-3">
            4. Apakah Anda mempunyai pekerjaan sampingan? Dimana dan sebagai apa?
            <span class="text-red-500">*</span>
        </label>
        <div class="flex gap-4 mb-3">
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="question_4_answer" value="yes" required
                    class="w-4 h-4 text-primary-900 border-gray-300 focus:ring-primary-900"
                    onchange="toggleExplanation('question_4', true)">
                <span class="ml-2 text-sm text-gray-700">Ya</span>
            </label>
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="question_4_answer" value="no"
                    class="w-4 h-4 text-primary-900 border-gray-300 focus:ring-primary-900"
                    onchange="toggleExplanation('question_4', false)">
                <span class="ml-2 text-sm text-gray-700">Tidak</span>
            </label>
        </div>
        <div id="question_4_explanation" class="hidden">
            <textarea name="question_4_explanation" rows="2"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-900 focus:border-transparent text-sm"
                placeholder="Sebutkan dimana dan posisi apa..."></textarea>
        </div>
    </div>

    {{-- Question 5 --}}
    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
        <label class="block text-sm font-semibold text-gray-900 mb-3">
            5. Apakah anda mempunyai teman/sanak saudara yang bekerja di group/perusahaan ini? Sebutkan!
            <span class="text-red-500">*</span>
        </label>
        <div class="flex gap-4 mb-3">
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="question_5_answer" value="yes" required
                    class="w-4 h-4 text-primary-900 border-gray-300 focus:ring-primary-900"
                    onchange="toggleExplanation('question_5', true)">
                <span class="ml-2 text-sm text-gray-700">Ya</span>
            </label>
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="question_5_answer" value="no"
                    class="w-4 h-4 text-primary-900 border-gray-300 focus:ring-primary-900"
                    onchange="toggleExplanation('question_5', false)">
                <span class="ml-2 text-sm text-gray-700">Tidak</span>
            </label>
        </div>
        <div id="question_5_explanation" class="hidden">
            <textarea name="question_5_explanation" rows="2"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-900 focus:border-transparent text-sm"
                placeholder="Sebutkan nama dan hubungan..."></textarea>
        </div>
    </div>

    {{-- Question 6 --}}
    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
        <label class="block text-sm font-semibold text-gray-900 mb-3">
            6. Apakah Anda pernah menderita sakit keras/kronis/kecelakaan berat/operasi? Bilamana dan macam apa?
            Jelaskan!
            <span class="text-red-500">*</span>
        </label>
        <div class="flex gap-4 mb-3">
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="question_6_answer" value="yes" required
                    class="w-4 h-4 text-primary-900 border-gray-300 focus:ring-primary-900"
                    onchange="toggleExplanation('question_6', true)">
                <span class="ml-2 text-sm text-gray-700">Ya</span>
            </label>
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="question_6_answer" value="no"
                    class="w-4 h-4 text-primary-900 border-gray-300 focus:ring-primary-900"
                    onchange="toggleExplanation('question_6', false)">
                <span class="ml-2 text-sm text-gray-700">Tidak</span>
            </label>
        </div>
        <div id="question_6_explanation" class="hidden">
            <textarea name="question_6_explanation" rows="2"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-900 focus:border-transparent text-sm"
                placeholder="Jelaskan kondisi kesehatan..."></textarea>
        </div>
    </div>

    {{-- Question 7 --}}
    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
        <label class="block text-sm font-semibold text-gray-900 mb-3">
            7. Apakah Anda pernah menjalani pemeriksaan Psikologi/Psikotest? Bilamana, di mana dan untuk tujuan apa?
            <span class="text-red-500">*</span>
        </label>
        <div class="flex gap-4 mb-3">
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="question_7_answer" value="yes" required
                    class="w-4 h-4 text-primary-900 border-gray-300 focus:ring-primary-900"
                    onchange="toggleExplanation('question_7', true)">
                <span class="ml-2 text-sm text-gray-700">Ya</span>
            </label>
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="question_7_answer" value="no"
                    class="w-4 h-4 text-primary-900 border-gray-300 focus:ring-primary-900"
                    onchange="toggleExplanation('question_7', false)">
                <span class="ml-2 text-sm text-gray-700">Tidak</span>
            </label>
        </div>
        <div id="question_7_explanation" class="hidden">
            <textarea name="question_7_explanation" rows="2"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-900 focus:border-transparent text-sm"
                placeholder="Sebutkan kapan dan dimana..."></textarea>
        </div>
    </div>

    {{-- Question 8 --}}
    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
        <label class="block text-sm font-semibold text-gray-900 mb-3">
            8. Apakah Anda pernah berurusan dengan polisi karena tindak kejahatan?
            <span class="text-red-500">*</span>
        </label>
        <div class="flex gap-4 mb-3">
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="question_8_answer" value="yes" required
                    class="w-4 h-4 text-primary-900 border-gray-300 focus:ring-primary-900"
                    onchange="toggleExplanation('question_8', true)">
                <span class="ml-2 text-sm text-gray-700">Ya</span>
            </label>
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="question_8_answer" value="no"
                    class="w-4 h-4 text-primary-900 border-gray-300 focus:ring-primary-900"
                    onchange="toggleExplanation('question_8', false)">
                <span class="ml-2 text-sm text-gray-700">Tidak</span>
            </label>
        </div>
        <div id="question_8_explanation" class="hidden">
            <textarea name="question_8_explanation" rows="2"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-900 focus:border-transparent text-sm"
                placeholder="Jelaskan..."></textarea>
        </div>
    </div>

    {{-- Question 9 --}}
    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
        <label class="block text-sm font-semibold text-gray-900 mb-3">
            9. Bila diterima, bersediakah Anda ditempatkan diluar kota? Sebutkan nama kota/daerahnya?
            <span class="text-red-500">*</span>
        </label>
        <div class="flex gap-4 mb-3">
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="question_9_answer" value="yes" required
                    class="w-4 h-4 text-primary-900 border-gray-300 focus:ring-primary-900"
                    onchange="toggleExplanation('question_9', true)">
                <span class="ml-2 text-sm text-gray-700">Ya</span>
            </label>
            <label class="inline-flex items-center cursor-pointer">
                <input type="radio" name="question_9_answer" value="no"
                    class="w-4 h-4 text-primary-900 border-gray-300 focus:ring-primary-900"
                    onchange="toggleExplanation('question_9', false)">
                <span class="ml-2 text-sm text-gray-700">Tidak</span>
            </label>
        </div>
        <div id="question_9_explanation" class="hidden">
            <textarea name="question_9_explanation" rows="2"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-900 focus:border-transparent text-sm"
                placeholder="Sebutkan kota/daerah yang bersedia..."></textarea>
        </div>
    </div>

    {{-- Question 10 --}}
    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
        <label class="block text-sm font-semibold text-gray-900 mb-3">
            10. Jenis pekerjaan/jabatan apakah yang sesuai dengan cita-cita Anda?
            <span class="text-red-500">*</span>
        </label>
        <input type="text" name="question_10_answer" required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-900 focus:border-transparent text-sm"
            placeholder="Contoh: Finance Accounting / Direktur">
    </div>

    {{-- Question 11 --}}
    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
        <label class="block text-sm font-semibold text-gray-900 mb-3">
            11. Jenis pekerjaan bagaimana yang tidak Anda sukai?
            <span class="text-red-500">*</span>
        </label>
        <input type="text" name="question_11_answer" required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-900 focus:border-transparent text-sm"
            placeholder="Contoh: Marketing">
    </div>

    {{-- Question 12 --}}
    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
        <label class="block text-sm font-semibold text-gray-900 mb-3">
            12. Bila diterima, berapa besar gaji dan fasilitas apa yang Anda harapkan?
            <span class="text-red-500">*</span>
        </label>
        <input type="text" name="question_12_answer" required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-900 focus:border-transparent text-sm"
            placeholder="Contoh: Rp. 10.000.000">
    </div>

    {{-- Question 13 --}}
    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
        <label class="block text-sm font-semibold text-gray-900 mb-3">
            13. Bila diterima, kapankah Anda dapat mulai bekerja?
            <span class="text-red-500">*</span>
        </label>
        <input type="text" name="question_13_answer" required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-900 focus:border-transparent text-sm"
            placeholder="Contoh: November atau 2 minggu setelah diterima">
    </div>

    {{-- Question 14 --}}
    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
        <label class="block text-sm font-semibold text-gray-900 mb-3">
            14. Sebutkan nama, alamat dan no. telp. orang yang dapat mereferensikan Anda dari perusahaan tempat Anda
            pernah bekerja!
            <span class="text-red-500">*</span>
        </label>
        <textarea name="question_14_answer" rows="3" required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-900 focus:border-transparent text-sm"
            placeholder="Nama: &#10;Alamat: &#10;No. Telp: "></textarea>
    </div>
</div>

<script>
    function toggleExplanation(questionId, show) {
        const explanationDiv = document.getElementById(questionId + '_explanation');
        const explanationTextarea = explanationDiv.querySelector('textarea');

        if (show) {
            explanationDiv.classList.remove('hidden');
            explanationTextarea.setAttribute('required', 'required');
        } else {
            explanationDiv.classList.add('hidden');
            explanationTextarea.removeAttribute('required');
            explanationTextarea.value = '';
        }
    }
</script>
