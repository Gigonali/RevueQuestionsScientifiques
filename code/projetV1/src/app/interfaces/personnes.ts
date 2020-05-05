export interface Personne {
  id_pers: number;
  nom_pers: string;
  prenom_pers: string;
  mailContact_pers?: string;
  mailConnexion_pers?: string;
  mdp_pers?: string;
  commentaire_pers?: string;
  estRecenseur_pers: number;
  estContact_pers: number;
  institutionCourte_pers?: string;
  institutionLongue_pers?: string;
  adr__Num_pers?: string;
  adr_Rue_pers?: string;
  adr_Cp_pers?: string;
  adr_Ville_pers?: string;
  adr_Pays_pers?: string;
  code_pers?: string;

}
