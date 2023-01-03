<p align="center"><a href="https://rs-erba.go.id" target="_blank"><img src="./public/assets/logo/logo.png" width="400" alt="Erba Logo Logo"></a></p>

## Tentang

Rumah Sakit Ernaldi Bahar, atau yang biasa disebut RS. Erba, merupakan salah satu unit kerja yang berada dalam cakupan Pemerintah Provinsi Sumatera Selatan.

Rumah Sakit ini berada di Jl. Tembus Terminal Alang-alang Lebar KM12 Kota Palembang.

<br/>

## Instalasi

Copy file `.env.example` dan sesuaikan <i>variable environtment</i> dengan local database.

```javascript
cp.env.example.env;
```

jalankan <i>artisan command</i> pada terminal untuk instal kebutuhan aplikasi

```javascript
composer install
```

jalankan <i>artisan command</i> pada terminal untuk eksekusi database dan user

```javascript
php artisan migrate --seed
```

<br/>

## Testing

```javascript
php artisan test
```

<br/>

## Otentikasi

Informasi login pengguna

```javascript
email:
admin@email.com //Role Superadmin
ipcn@email.com //Role IPCN

password: password
```
