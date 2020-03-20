import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TabPublicationstermineesComponent } from './tab-publicationsterminees.component';

describe('TabPublicationstermineesComponent', () => {
  let component: TabPublicationstermineesComponent;
  let fixture: ComponentFixture<TabPublicationstermineesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TabPublicationstermineesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TabPublicationstermineesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
