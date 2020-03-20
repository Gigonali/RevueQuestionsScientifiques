import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TabNouveauprojetComponent } from './tab-nouveauprojet.component';

describe('TabNouveauprojetComponent', () => {
  let component: TabNouveauprojetComponent;
  let fixture: ComponentFixture<TabNouveauprojetComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TabNouveauprojetComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TabNouveauprojetComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
