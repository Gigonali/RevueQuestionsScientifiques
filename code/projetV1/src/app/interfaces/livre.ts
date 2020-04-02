export interface Livre {
  id: number;
  isbn: string;
  isbnNum: string;
  nomAuteur: string;
  prenomAuteur: string;
  titre: string;
  annee: Date;
  collection: string;
  pages: number;
  prix: number; // Vérification que le nombre n'est pas troqué nécessaire
  brochure: string;
  responsabiliteEdition?: string;
  responsabiliteTraduction?: string;

}
