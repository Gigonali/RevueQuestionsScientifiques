// This file can be replaced during build by using the `fileReplacements` array.
// `ng build --prod` replaces `environment.ts` with `environment.prod.ts`.
// The list of file replacements can be found in `angular.json`.

export const environment = {
  /* API système */
  //apiAuthentification: 'http://localhost/projetV1/api/Authentification.php',
  apiReinitialisation: 'http://localhost/www/github/RevueQuestionsScientifiques/code/projetV1/api/Reinitialisation.php',
  apiAuthentification: 'http://localhost/www/github/RevueQuestionsScientifiques/code/projetV1/api/Authentification.php',

  /* API tab-component */
  // tab-analysescritique
  // apiAnalysesCritique: 'http://localhost/www/github/RevueQuestionsScientifiques/code/projetV1/api/AnalyseCritique.php',
  // tab-articles
  // apiArticles: 'http://localhost/www/github/RevueQuestionsScientifiques/code/projetV1/api/Article.php',
  // tab-comptesrendus
  // apiComptesRendus: 'http://localhost/www/github/RevueQuestionsScientifiques/code/projetV1/api/CompteRendu.php',
  // tab-divers
  // apiDivers: 'http://localhost/www/github/RevueQuestionsScientifiques/code/projetV1/api/Divers.php',
  // tab-domaines
  apiDomaine: 'http://localhost/www/github/RevueQuestionsScientifiques/code/projetV1/api/Domaine.php',
  // tab-editeurs
  apiMaisonEdition: 'http://localhost/www/github/RevueQuestionsScientifiques/code/projetV1/api/MaisonEdition.php',
  // tab-livres
  apiLivre: 'http://localhost/www/github/RevueQuestionsScientifiques/code/projetV1/api/Livre.php',
  // tab-maintenance
   apiMaintenance: 'http://localhost/www/github/RevueQuestionsScientifiques/code/projetV1/api/Backup.php',
  // tab-messagesautomatique
  // apiMessageAutomatique: 'http://localhost/www/github/RevueQuestionsScientifiques/code/projetV1/api/MessageAutomatique.php',
  // tab-nouveaucompterendu
  // apiNouveauCompteRendu: 'http://localhost/www/github/RevueQuestionsScientifiques/code/projetV1/api/NouveauCompteRendu.php',
  // tab-nouveauprojet
  // apiNouveauProjet: 'http://localhost/www/github/RevueQuestionsScientifiques/code/projetV1/api/NouveauProjet.php',
  // tab-parametredeconnexion
  // apiParametreDeConnexion: 'http://localhost/www/github/RevueQuestionsScientifiques/code/projetV1/api/ParametreDeConnexion.php',
  // tab-personnalisation
  // apiPersonnalisation: 'http://localhost/www/github/RevueQuestionsScientifiques/code/projetV1/api/Personnalisation.php',
  // tab-personnes
  apiPersonne: 'http://localhost/www/github/RevueQuestionsScientifiques/code/projetV1/api/Personne.php',
  // tab-recherche
  // apiRecherche: 'http://localhost/www/github/RevueQuestionsScientifiques/code/projetV1/api/.php',
  // tab-revue, tab-specialhelha
  apiRevue: 'http://localhost/www/github/RevueQuestionsScientifiques/code/projetV1/api/Revue.php',
  production: false
};

/*
 * For easier debugging in development mode, you can import the following file
 * to ignore zone related error stack frames such as `zone.run`, `zoneDelegate.invokeTask`.
 *
 * This import should be commented out in production mode because it will have a negative impact
 * on performance if an error is thrown.
 */
// import 'zone.js/dist/zone-error';  // Included with Angular CLI.
