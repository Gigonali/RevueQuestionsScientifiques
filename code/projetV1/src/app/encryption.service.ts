import { Injectable } from '@angular/core';
import * as CryptoJS from 'crypto-js';
import * as bcrypt from 'bcryptjs';

@Injectable({
  providedIn: 'root'
})
export class EncryptionService {
  hashed: string;
  constructor() { }
  /*encrypt(value: string): string {
    return CryptoJS.SHA1(value).toString();
  }*/

  encrypt(value: string): string {
    const saltRounds = 10;
    this.hashed = bcrypt.hashSync(value, saltRounds);
    alert(this.hashed);
    return this.hashed;
  }
}
