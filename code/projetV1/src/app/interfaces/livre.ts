export interface Livre {
  id: number;
  isbn: string;
  isbnNumerique: string;
  nomAuteur: string;
  prenomAuteur: string;
  titre: string;
  annee: Date;
  collection: string;
  pages: number;
  prix: number; // Vérification que le nombre n'est pas troqué nécessaire
  brochure: string;
  respEdition?: string;
  respTraduction?: string;
  idEtatLivre: number;
}
