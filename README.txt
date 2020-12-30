### Installation ###
 
Add Scafold to your composer.json file to require Scafold :
```
    require : {
        "sysfast/roles": "dev-master"
    }
```
 
Update Composer :
```
    composer update sysfast/roles
```
 
on user model add:
```
    use App\Traits\HasRolesTrait;
	use HasFactory, Notifiable,HasRolesTrait;
```
 
### Publish ###
 
The last required step is to publish views and assets in your application with :
```
    php artisan vendor:publish
```
 
Congratulations, you have successfully installed Scafold !