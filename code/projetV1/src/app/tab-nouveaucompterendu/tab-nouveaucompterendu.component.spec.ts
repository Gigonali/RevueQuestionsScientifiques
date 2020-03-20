import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TabNouveaucompterenduComponent } from './tab-nouveaucompterendu.component';

describe('TabNouveaucompterenduComponent', () => {
  let component: TabNouveaucompterenduComponent;
  let fixture: ComponentFixture<TabNouveaucompterenduComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TabNouveaucompterenduComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TabNouveaucompterenduComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
