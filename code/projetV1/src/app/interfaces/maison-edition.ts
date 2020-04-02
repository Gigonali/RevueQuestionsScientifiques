import { AdressePostale } from './adresse-postale';

export interface MaisonEdition {
  id: number;
  nom: string;
  nomClassement: string;
  nomCorrespondant?: string;
  mailCorrespondant?: string;
  adresse?: AdressePostale;

}
