<div>
    <label for="first_name">Ім'я</label>
    <input id="first_name" name="first_name" type="text"
           value="{{ old('first_name', $patient->first_name ?? '') }}">
    @error('first_name') <p class="error">{{ $message }}</p> @enderror
</div>

<div>
    <label for="last_name">Прізвище</label>
    <input id="last_name" name="last_name" type="text"
           value="{{ old('last_name', $patient->last_name ?? '') }}">
    @error('last_name') <p class="error">{{ $message }}</p> @enderror
</div>

<div>
    <label for="birth_date">Дата народження</label>
    <input id="birth_date" name="birth_date" type="date"
           value="{{ old('birth_date', isset($patient) ? $patient->birth_date->format('Y-m-d') : '') }}"
           max="{{ date('Y-m-d') }}">
    @error('birth_date') <p class="error">{{ $message }}</p> @enderror
</div>

<div>
    <label for="gender">Стать</label>
    <select id="gender" name="gender">
        <option value="M" {{ old('gender', $patient->gender ?? '') === 'M' ? 'selected' : '' }}>Чоловіча</option>
        <option value="F" {{ old('gender', $patient->gender ?? '') === 'F' ? 'selected' : '' }}>Жіноча</option>
    </select>
    @error('gender') <p class="error">{{ $message }}</p> @enderror
</div>

<div>
    <label for="phone">Телефон</label>
    <input id="phone" name="phone" type="text" placeholder="+380XXXXXXXXX"
           value="{{ old('phone', $patient->phone ?? '') }}">
    @error('phone') <p class="error">{{ $message }}</p> @enderror
</div>

<div>
    <label for="email">Email</label>
    <input id="email" name="email" type="text"
           value="{{ old('email', $patient->email ?? '') }}">
    @error('email') <p class="error">{{ $message }}</p> @enderror
</div>

<div>
    <label for="diagnosis">Діагноз</label>
    <input id="diagnosis" name="diagnosis" type="text"
           value="{{ old('diagnosis', $patient->diagnosis ?? '') }}">
    @error('diagnosis') <p class="error">{{ $message }}</p> @enderror
</div>
