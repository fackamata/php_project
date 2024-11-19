# php_project

## git bonne pratique

avant de modifier un projet toujours faire un `git pull` pour mettre à jour notre projet et ne pas créer de conflit.

faire une nouvelle branch `git branch nomDeBranch` 

se déplacer sur la nouvelle branch `git checkout nomDeBranch`

pour vérifier sur quel branche on se trouve `git branch`

une fois toute nos modif effectuer on add/commit et on `git push` sur notre branch, c'est bien de commiter des petits changement de code, quitte à avoir 150 commit, ça aide en cas de cassage de code de pouvoir remonter les modifications petit à petit. Genre tous les fonctions, ou partie de code lié.

Pour que les autre branches soit à jour, on doit recoler (merge) nos branch. Pour ce faire :
 - retourner sur la branch principal `git checkout main`
 - on merge notre branche `git merge nomDeBranch`. C'est à dire que l'on merge la branche préciser dans la commande sur la branche où l'on se trouve.
 - on peut vérifier avec un git log --graph, les modif de nomDeBranch sont maintenant présente sur la branche main

C'est pour cela qu'il faut toujours faire un pull du repo distant avant toutes modification de code. Si des modifications on été faites et qu'on a pas pull, on aura des conflits au moment du push car on n'aura pas la même base.

```
	  A---B---C  nomDeBranch
	 /         \
    D---E---F---G---H main
```

### git commande utiles

```
git pull            # se mettre à jour avec le repo distant
                    ####    toujours se mettre à jour avant d'écrire du code pour ne pas créer de conflit

git log             # voir l'historique de notre projet et les différents commits
git log --graph
git status          # voir si on est a jour avec le repo ou si on doit commit/push des changements

git add .           # ajoute tous les fichiers modifier `.` au prochain commit, ou on peut mettre directement des noms de fichier
git commit -m ".."  # une fois toutes les modfis ajouter (celle voulu), on commit un message 
git push            # on push notre commit précédent vers le repo distant, ce qui le met à jour.

git merge branchX   # quand on veux recoler notre branche à la branche master 
```


