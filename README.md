1. В проекте использовалась sqlite БД.
2. Запустите миграции.
3. Некоторые функции были покрыты тестами.
4. Добавлена валидация для данных пользователя при регистрации. Только уникальный username и phone number, phone number должен начинаться с +, содержать тольцо цифры и быть не длинее 16 символов
5. При деактивации линки пользователь так же удаляется с БД и можно создать нового с тем же телефоном и именем.
6. При генерации новой уникальной ссылки, количество дней ее использования(7) начинают считаться заново.
