import { TestBed } from '@angular/core/testing';

import { MaisonEditionService } from './maison-edition.service';

describe('MaisonEditionService', () => {
  let service: MaisonEditionService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(MaisonEditionService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
