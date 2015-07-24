
.PHONY: css

install:
	bower install
	
css:
	lessc less/bo-assembler.less bo.css --clean-css="--s1 --advanced --compatibility=ie8"


dist:
	cp bower_components/bootstrap/dist/js/bootstrap.min.js js
	cp bower_components/jquery/dist/jquery.min.js js
	cp -R bower_components/stampa/fonts/ fonts
	cp -R bower_components/stampa/less/ less/stampa