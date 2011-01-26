# Post-Receive from GitHub

Allows you to automatically update a remotely hosted `VERSION` file after pushing to a [GitHub][1] repository by parsing the [`$_POST['payload']` returned][2].

## Requirements

* PHP5 (or above)

## Installation

On your web server, clone this repo

	git clone git://github.com/jadb/hook-github-post-receive.git
 
In your repository, create, commit and push the same VERSION file

	touch VERSION
	git add VERSION
	git commit -m 'Added VERSION file'
	git push
 
In your GitHub's repository, go to Admin > Web Hook > Custom URL and insert the URL to this script

## Usage

Update the local VERSION file

	echo '0.1.0' > VERSION
	git add VERSION

Now commit and make sure to include the new version number in the message

	git commit -m 'Bumped version to 0.1.0'
	git push

## Patches & Features

* Fork
* Mod, fix
* Test - this is important, so it's not unintentionally broken
* Commit - do not mess with license, todo, version, etc. (if you do change any, bump them into commits of their own that I can ignore when I pull)
* Pull request - bonus point for topic branches

## Bugs & Feedback

http://github.com/jadb/hook-github-post-receive/issues

[1]: http://github.com
[2]: http://help.github.com/post-receive-hooks/