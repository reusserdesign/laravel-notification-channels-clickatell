USER_ID  := $(shell id -u ${USER})
GROUP_ID := $(shell id -g ${USER})

COMPOSER := docker run \
	--user ${USER_ID}:${GROUP_ID} \
	--rm \
	--interactive \
	--tty \
	--volume ${PWD}:/app composer

test:
	${COMPOSER} test

coverage:
	${COMPOSER}

update:
	${COMPOSER} update

install:
	${COMPOSER} install

validate:
	${COMPOSER} validate

composer:
	${COMPOSER}

clean:
	rm -rf \
		./vendor \
		./build \
		composer.lock \
		.phpunit.result.cache

all: clean validate install test