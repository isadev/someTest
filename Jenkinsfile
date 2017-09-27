#!/usr/bin/env groovy
node {
	checkout([
		$class: 'GitSCM', 
		branches: [[name: 'feature/strappTest']], 
		extensions: [[
			$class: 'LocalBranch', 
			localBranch: 'feature/strappTest'
		]], 
		submoduleCfg: [], 
		userRemoteConfigs: [[
			url: 'https://github.com/isadev/someTest.git'
		]]
	])

	stage ("obteniendo el nombre de la rama") {
		echo "1 $env.BRANCH_NAME"
		echo "2 branch"
		echo "3 $branch"
		echo "4 ${branch}"

	}
	stage ("descargando los cambios de la rama") {

	}


	stage ('Ejecutando script que borra cache y compila los estilos') {
		//sh "ssh sharepoint@192.168.80.247 ./scripts_symfony.sh"

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
