import { TestBed } from '@angular/core/testing';

import { AuteurGuard } from './auteur.guard';

describe('AuteurGuard', () => {
  let guard: AuteurGuard;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    guard = TestBed.inject(AuteurGuard);
  });

  it('should be created', () => {
    expect(guard).toBeTruthy();
  });
});
