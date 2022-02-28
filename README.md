# Laravel Mutasibank (Mutasibank.co.id)

Laravel PHP library untuk mengintegrasikan Aplikasi Anda dengan API Mutasibank (mutasibank.co.id). Untuk dokumentasi lebih jelas dan lengkap, silahkan kunjungi website resminya di [API Mutasibank](https://documenter.getpostman.com/view/367648/RWTkRJgG)

## Fitur Library

- [Installasi](https://github.com/indofx/mutasibank.co.id#instalasi)
- [Setting](https://github.com/indofx/mutasibank.co.id#setting)
- [Get Current User](https://github.com/indofx/mutasibank.co.id#get-current-user)
- [Get All Accounts](https://github.com/indofx/mutasibank.co.id#get-all-accounts)
- [Get Account by ID](https://github.com/indofx/mutasibank.co.id#get-account-by-id)
- [Validate Transaction](https://github.com/indofx/mutasibank.co.id#validate-transaction)
- [Re-run Check Mutasi](https://github.com/indofx/mutasibank.co.id#re-run-check-mutasi)
- [Match Transaction](https://github.com/indofx/mutasibank.co.id#match-transaction)
- [Get Account Statements](https://github.com/indofx/mutasibank.co.id#get-account-statements)
- [On Off Account](https://github.com/indofx/mutasibank.co.id#on-off-account)

### INSTALASI

```bash
composer require indofx/mutasibank
```

# Setup

Setelah installasi, publish konfigurasi yang dipergunakan oleh library

```bash
php artisan vendor:publish --provider="Indofx\Mutasibank\ServiceProvider" --tag="mutasibank-config"
```

### SETTING

Papda Konfigurasi `config/mutasibank.php`, silahkan input Environment yang sesuai dengan kebutuhan Anda.

```php
        [
            'url' => 'https://mutasibank.co.id/api/v1/',
            'token' => 'your-token'
        ],
```

### Get current user

```php

    use Indofx\Mutasibank\Mutasibank;

    $mutasibank = new Mutasibank();
    $response = $mutasibank->getCurrentUser();
    dd($response->json());
```

### Get all accounts

```php

    use Indofx\Mutasibank\Mutasibank;

    $mutasibank = new Mutasibank();
    $response = $mutasibank->getAllAccount();
    dd($response->json());
```

### Get account by ID

```php

    use Indofx\Mutasibank\Mutasibank;

    $mutasibank = new Mutasibank();

    $accountID = 123;
    $response = $mutasibank->getAccountById($accountID);
    dd($response->json());
```

### Validate Transaction

```php

    use Indofx\Mutasibank\Mutasibank;

    $mutasibank = new Mutasibank();

    $transactionID = 47835362;
    $response = $mutasibank->validateTransaction($transactionID);
    dd($response->json());
```

### Re run check mutasi

```php

    use Indofx\Mutasibank\Mutasibank;

    $mutasibank = new Mutasibank();

    $accountID = 123;
    $response = $mutasibank->rerunCheckMutasi($accountID);
    dd($response->json());
```

### Match Transaction

```php

    use Indofx\Mutasibank\Mutasibank;

    $mutasibank = new Mutasibank();

    $accountID = 123;
    $amount = 10333;
    $response = $mutasibank->matchTransaction($accountID, $amount);
    dd($response->json());
```

### Get account statement

```php

    use Indofx\Mutasibank\Mutasibank;

    $mutasibank = new Mutasibank();

    $accountID = 123;
    $dateFrom = '2022-01-01';
    $dateTo = '2022-02-29';
    $response = $mutasibank->getAccountStatement($accountID, $dateFrom, $dateTo);
    dd($response->json());
```

### On Off account

```php

    use Indofx\Mutasibank\Mutasibank;

    $mutasibank = new Mutasibank();

    $accountID = 123;
    $response = $mutasibank->onOffAccount($accountID);
    dd($response->json());
```
