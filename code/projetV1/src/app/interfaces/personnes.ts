import { AdressePostale } from './adresse-postale';

export interface Personne {
  id: number;
  nom: string;
  prenom: string;
  mailContact?: string;
  mailConnexion?: string;
  mdp?: string;
  commentaire?: string;
  estRescenseur: boolean;
  estContact: boolean;
  institutionCourte?: string;
  institutionLongue?: string;
  adresse?: AdressePostale;

}
