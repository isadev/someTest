#!/usr/bin/env groovy
node {
	
	stage ("obteniendo el nombre de la rama") {
		echo "$env.BRANCH_NAME"
	}
	stage ('Moviendo al directorio del repositorio') {

		sh "pwd;env; ssh sharepoint@192.168.80.247 ls"

		//sh "ssh "
		//sh "cd /vol/dat/dat0/usr/resp_luis_villalobos"
		//echo "pwd"		
	}
	/*stage ('Ejecutando comando de symfony') {
		steps {
			
			sh "app/console assets:install --symlink"
			sh "app/console cache:clear"
			sh "app/console cache:clear --env=prod"
			sh "sudo chown -R 'whoami':'whoami' app/cache/ "
		}
	}*/


	
	
}
