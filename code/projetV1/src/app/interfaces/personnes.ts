export interface Personne {
  id_pers: number;
  nom_pers: string;
  prenom_pers: string;
  mail_contact_pers?: string;
  mail_connexion_pers?: string;
  mdp_pers?: string;
  commentaire_pers?: string;
  estRecenseur_pers: number;
  estContact_pers: number;
  institution_courte_pers?: string;
  institution_longue_pers?: string;
  adr_num_pers?: string;
  adr_rue_pers?: string;
  adr_cp_pers?: string;
  adr_ville_pers?: string;
  adr_pays_pers?: string;
  code_pers?: string;

}
