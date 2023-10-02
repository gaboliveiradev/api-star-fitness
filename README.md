# PIPELINE START API XD 🫶

*Por padrão a aplicação localmente rodará no **localhost:3000*** 🪲 <br>
*Um exemplo de rota a ser acessada é http://localhost:3000/api/{uri}* 🐗<br><br>

*É necessário ter o **/api**, para o laravel identificar que está se trata de uma rota de api e não retornará uma view* 🌵

**1. Clone o repositório (link abaixo):** 🐓
```
git clone https://github.com/gaboliveiradev/api-star-fitness.git
```

**2. Entre na pasta clonada e execute o seguinte comando:** 🐁
```
composer i
```

**3. Procure pelo arquivo .env.example**
```
Renomear ele para >>> .env
```

**4. Altere a porta de acesso do banco de dados se necessário**
```
DB_PORT=3307 (ou sua porta do MySql)
```

**5. Depois de renomear, entre no arquivo e procure por DB_PASSWORD (provavelmente linha 16)**
```
DB_PASSWORD=etecjau (ou a senha do seu MySql)
```

**6. Ainda no arquivo .env adicione este código logo acima dos dados de conexão com o MySql**
```
SANCTUM_STATEFUL_DOMAINS=http://localhost:3000
```

**7. Em suma você poderá alterar os seguintes dados de conexão no arquivo .env que você renomeu**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=api_star_fitness
DB_USERNAME=root
DB_PASSWORD=etecjau
```

**8. Logo em seguinda, execute esses 3 comandos, nesta mesma ordem** 🦚
```
php artisan migrate
php artisan db:seed
php artisan key:generate
php artisan serve
```

# ROTAS DA APLIACAÇÃO (LOGIN) 🥤

**URI: /login/employee** <br>
**MÉTODO: POST** <br>
**PARÂMETROS:** <br>
```
email,
password
```

<hr>

**URI: /login/gym-member** <br>
**MÉTODO: POST** <br>
**PARÂMETROS:** <br>
```
document,
password
```

<hr>

**ATENÇÃO:** *O restante das rotas estão no arquivo **routes/api.php**, para saber oq enviar para cada url, basta olhar o arquivo **http/request**, lá está todos os request das rotas.*
